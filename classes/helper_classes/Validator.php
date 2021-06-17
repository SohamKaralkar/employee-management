<?php

class Validator{
    private $di;
    protected $rules = ['required', 'minlength', 'maxlength', 'unique', 'email', 'phone', 'phoneTemp', 'gstNumber'];

    protected $messages = [
        'required' => 'The :field field is required',
        'minlength' => 'The :field field must be a minimum of :satisfier characters',
        'maxlength' => 'The :field field must be maximum of :satisfier char',
        'email' => 'This is not a valid email address',
        'unique' => 'That :field is already taken',
        'phone' => 'That is not a valid phone number',
        'phoneTemp' => 'That is not a valid phone number'
    ];

    public function __construct($di){
        $this->di = $di;
    }

    public function check($items, $rules){
        foreach($items as $item => $value){
            if(in_array($item, array_keys($rules))){
                $this->validate([
                    'field' => $item,
                    'value' => $value,
                    'rules' => $rules[$item]
                ]);
            }
        }
        return $this;
    }

    public function validate($item){
        $field = $item['field'];
        foreach($item['rules'] as $rule => $satisfier){
            if(!call_user_func_array([$this, $rule], [$field, $item['value'],$satisfier])){
                $this->di->get('errorhandler')->addError(str_replace([':field', ':satisfier'], [$field, $satisfier], $this->messages[$rule]),$field);
            }
        }
    }

    public function required($field, $value, $satisfier){
        return !empty(trim($value));
    }

    public function phone($field, $value, $satisfier){
        return strlen(preg_replace('/^[0-9]{10}/','',$value)) == 10;
    }
    
    public function phoneTemp($field, $value, $satisfier){
        return strlen($value) == 10;
    }
    public function minlength($field, $value, $satisfier){
        return mb_strlen($value) >= $satisfier;
    }

    public function maxlength($field, $value, $satisfier){
        return mb_strlen($value) <= $satisfier;
    }

    public function unique($field, $value, $satisfier){
        return !$this->di->get('database')->exists($satisfier, [$field=>$value]);
    }

    public function email($field,$value, $satisfier){
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public function gstNumber($field,$value, $satisfier){
        return strlen($value) == 15;
    }
    public function fails(){
        return $this->di->get('errorhandler')->hasErrors();
    }

    public function errors(){
        return $this->di->get('errorhandler');
    }
}
?>