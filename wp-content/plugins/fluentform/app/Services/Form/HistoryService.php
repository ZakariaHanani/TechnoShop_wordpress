<?php

namespace FluentForm\App\Services\Form;

use FluentForm\App\Models\FormMeta;
use FluentForm\App\Services\Parser\Form;
use FluentForm\Framework\Helpers\ArrayHelper as Arr;

class HistoryService
{
    private $changes = [];
    private $addedFields = [];
    private $removedFields = [];
    
    public function init($form, $postData)
    {
        $oldData = json_decode($form->form_fields, true);
        $newData = json_decode($postData['form_fields'], true);
        
        $this->checkAndStoreFormChanges($oldData, $newData, $form->id);
    }
    
 
    public function checkAndStoreFormChanges($oldData, $newData, $formId)
    {
     
        $this->compareFields($oldData['fields'], $newData['fields']);
        $this->compareFields([$oldData['submitButton']], [$newData['submitButton']]);

        if (Arr::isTrue($oldData, 'stepsWrapper.stepStart') && Arr::isTrue($newData, 'stepsWrapper.stepStart')) {
            $newFirstSteps = Arr::get($newData, 'stepsWrapper.stepStart');
            $newLastSteps = Arr::get($newData, 'stepsWrapper.stepEnd');
            $oldFirstSteps = Arr::get($oldData, 'stepsWrapper.stepStart');
            $oldLastSteps = Arr::get($oldData, 'stepsWrapper.stepEnd');
            $this->compareFields([$oldFirstSteps, $oldLastSteps], [$newFirstSteps, $newLastSteps]);
        }

        if (!empty($this->changes)) {
            $changeTitle = $this->generateChangeTitle();
            $this->storeFormHistory($formId, $oldData, $changeTitle);
           
        }
        
    }
    
    
    private function compareFields($oldFields, $newFields)
    {
        $oldFieldMap = $this->mapFieldsByUniqueKey($oldFields);
        $newFieldMap = $this->mapFieldsByUniqueKey($newFields);
       
    
        // Check for removed fields
        foreach ($oldFieldMap as $key => $oldField) {
            if (!isset($newFieldMap[$key])) {
                $fieldLabel = $this->getFieldLabel($oldField);
                $this->addChange('removed', $fieldLabel);
                $this->removedFields[] = $key;
            }
        }
    
        // Check for added fields
        foreach ($newFieldMap as $key => $newField) {
            if (!isset($oldFieldMap[$key])) {
                $fieldLabel = $this->getFieldLabel($newField);
                $this->addChange('added', $fieldLabel);
                $this->addedFields[] = $key;
            }
        }
        $oldKeys = array_keys($oldFieldMap);
        $newKeys = array_keys($newFieldMap);
    
        // Check if it's just a reordering
        if (count($oldKeys) === count($newKeys) && array_diff($oldKeys, $newKeys) === array_diff($newKeys, $oldKeys)) {
            if ($oldKeys !== $newKeys) {
                $this->addChange('reordered', 'Fields');
            }
            // Compare field details even if order changed
            foreach ($newFieldMap as $key => $newField) {
                $this->compareFieldDetails($oldFieldMap[$key], $newField);
            }
            return;
        }
    
        // Compare existing fields
        foreach ($newFieldMap as $key => $newField) {
            if (isset($oldFieldMap[$key])) {
                $this->compareFieldDetails($oldFieldMap[$key], $newField);
            }
        }
    
    
        // Check for reordering only if no fields were added or removed
        if (empty($this->addedFields) && empty($this->removedFields)) {
            $this->checkFieldOrder($oldFields, $newFields);
        }
    }
    
    private function mapFieldsByUniqueKey($fields)
    {
        $map = [];
        foreach ($fields as $field) {
            $map[$this->getFieldKey($field)] = $field;
        }
        return $map;
    }

    private function getFieldKey($field)
    {
        return $field['uniqElKey'] ?? $field['element'];
    }
    
    private function getFieldLabel($field)
    {
        return $field['settings']['label'] ?? $field['element'] ?? 'Unnamed Field';
    }
    
    private function compareFieldDetails($oldField, $newField)
    {
        if (in_array($this->getFieldKey($oldField), $this->addedFields) || in_array($this->getFieldKey($oldField), $this->removedFields)) {
            return;
        }
        $fieldLabel = $this->getFieldLabel($newField);
        $categories = ['settings', 'attributes', 'fields', 'columns'];
    
        foreach ($categories as $category) {
            $this->compareFieldProperties($oldField, $newField, $fieldLabel, $category);
        }
    }
    
    private function compareFieldProperties($oldField, $newField, $fieldLabel, $category)
    {
        if (!isset($oldField[$category]) && !isset($newField[$category])) {
            return;
        }
        if ($category === 'columns') {
            if ($this->areColumnsChanged($oldField[$category] ?? [], $newField[$category] ?? [])) {
                $this->addChange('modified', $fieldLabel, 'columns', 'Changed', null, $category);
            }
            return;
        }
        $this->compareArrayRecursively($oldField[$category] ?? [], $newField[$category] ?? [], $fieldLabel, $category);
    }
    
    private function compareArrayRecursively($oldValue, $newValue, $fieldLabel, $category, $parentKey = '')
    {
       
    
    
        foreach ($newValue as $key => $value) {
            $currentKey = $parentKey ? "$parentKey.$key" : $key;
            
            if (!isset($oldValue[$key]) || $oldValue[$key] !== $value) {
                if (!is_array($value)) {
                    $this->addChange('modified', $fieldLabel, $currentKey, $value, $oldValue[$key] ?? null, $category);
                } else {
                    $this->compareArrayRecursively($oldValue[$key] ?? [], $value, $fieldLabel, $category, $currentKey);
                }
            }
        }
    }
    
    private function areColumnsChanged($oldColumns, $newColumns)
    {
        return $oldColumns !== $newColumns;
    }
    
    private function checkFieldOrder($oldFields, $newFields)
    {
        $oldOrder = array_map(function ($field) {
            return $field['uniqElKey'];
        }, $oldFields);
        
        $newOrder = array_map(function ($field) {
            return $field['uniqElKey'];
        }, $newFields);
        
        if ($oldOrder !== $newOrder) {
            $this->addChange('reordered', 'Fields');
        }
    }
    
    private function addChange($type, $label, $key = null, $newValue = null, $oldValue = null, $category = null)
    {
        $change = [
            'type'  => $type,
            'label' => $label
        ];
        
        if ($key !== null) {
            $change['key'] = $key;
        }
        
        if ($newValue !== null && !is_array($newValue)) {
            $change['new_value'] = $newValue;
        }
        
        if ($oldValue !== null && !is_array($oldValue)) {
            $change['old_value'] = $oldValue;
        }
        
        if ($label !== null && $key !== null && !is_array($newValue)) {
            $oldValue = $oldValue ?: 'empty';
            if(is_bool($oldValue)){
                $oldValue = $oldValue ? 'Active' : 'inActive';
            }
            if(is_bool($newValue)){
                $newValue = $newValue ? 'Active' : 'inActive';
            }
            $change['info'] = ucfirst($type) . " $label $key value from '$oldValue' to '$newValue'";
        } elseif ($type !== null && $label !== null) {
            $change['info'] = ucfirst($type) . " $label ";
        }
        
        if ($category !== null) {
            $change['category'] = $category;
        }
        
        $this->changes[] = $change;
    }
    
    private function generateChangeTitle()
    {
        $addedCount = count($this->addedFields);
        $removedCount = count($this->removedFields);
        $modifiedCount = count(array_filter($this->changes, function($change) {
            return $change['type'] === 'modified';
        }));
        $reorderedCount = count(array_filter($this->changes, function($change) {
            return $change['type'] === 'reordered';
        }));
    
        $changeDescriptions = [];
        if ($addedCount > 0) {
            $changeDescriptions[] = "Added " . ($addedCount > 1 ? "$addedCount fields" : "1 field");
        }
        if ($removedCount > 0) {
            $changeDescriptions[] = "Removed " . ($removedCount > 1 ? "$removedCount fields" : "1 field");
        }
        if ($modifiedCount > 0) {
            $changeDescriptions[] = "Modified " . ($modifiedCount > 1 ? "$modifiedCount attributes/settings" : "1 attribute/setting");
        }
        if ($reorderedCount > 0) {
            $changeDescriptions[] = "Reordered fields";
        }
        
        if (count($changeDescriptions) > 1) {
            return "Multiple changes";
        } elseif (count($changeDescriptions) == 1) {
            return $changeDescriptions[0];
        }
        return "Form structure changed";
    }
    
    private function storeFormHistory($formId, $oldData, $changeTitle)
    {
        $revisions = FormMeta::where('form_id', $formId)
            ->where('meta_key', 'revision')
            ->count();
        if ($revisions === 0) {
            $changeTitle = __('Initial state','fluentform');
        }
        $historyEntry = [
            'change_title' => $changeTitle,
            'timestamp'    => current_time('mysql'),
            'old_data'     => json_encode($oldData),
            'changes'      => json_encode($this->changes)
        ];
        $this->maybeCleanOldData($formId);
        FormMeta::insert([
            'form_id'  => $formId,
            'meta_key' => 'revision',
            'value'    => json_encode($historyEntry)
        ]);
    }
    
    public static function get($formId)
    {
        $revisions = FormMeta::where('form_id', $formId)
            ->where('meta_key', 'revision')
            ->get();
        
        $formattedRevisions = [];
        foreach ($revisions as $rev) {
            $data = json_decode($rev['value'], true);
            $data['old_data'] = json_decode($data['old_data'], true);
            $data['changes'] = json_decode($data['changes'], true);
            $data['timestamp'] = human_time_diff(current_time('timestamp'),strtotime($data['timestamp'])). ' ago';
            $formattedRevisions[] = $data;
        }
        
        return ['history' =>array_reverse( $formattedRevisions) ];
    }
    
    public function delete($formId)
    {
        FormMeta::remove($formId, 'revision');
    }
    
    /**
     * Delete records keeping only last 10 per form
     * @param $formId
     * @return void
     */
    private function maybeCleanOldData($formId)
    {
        $historyCount = FormMeta::where([
            'form_id'  => $formId,
            'meta_key' => 'revision',
        ])->count();
        
        if ($historyCount >= 10) {
            $entriesToRemove = $historyCount - 9;
            $oldestEntries = FormMeta::where([
                'form_id'  => $formId,
                'meta_key' => 'revision',
            ])
                ->orderBy('id', 'asc')
                ->limit($entriesToRemove)
                ->pluck('id');
            
            FormMeta::whereIn('id', $oldestEntries)->delete();
        }
    }
}
