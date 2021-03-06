<?php

namespace app\core;

abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'unique';
    public const RULE_NUMBER = 'number';
    public const RULE_INVALID_EMAIL = 'invalid email';
    public const RULE_WRONG_PASSWORD = 'wrong password';
    public const RULE_INVALID_ID = 'invalid id';

    abstract public function rules(): array;

    public function getLabel($attribute)
    {
        return '';
    }

    public array $errors = [];

    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }
                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($attribute, self::RULE_EMAIL);
                }
                if ($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
                    $this->addError($attribute, self::RULE_MIN, $rule);
                }
                if ($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addError($attribute, self::RULE_MAX, $rule);
                }
                if ($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}) {
                    $this->addError($attribute, self::RULE_MATCH, $rule);
                }
                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }
                if ($ruleName === self::RULE_UNIQUE) {
                    $className = $rule['class'];
                    $uniqueAttribute = $rule['attribute'] ?? $attribute;
                    $tableName = $className::tableName();
                    $statement = Application::$app->db->prepare("
                        SELECT * FROM $tableName WHERE $uniqueAttribute = :$uniqueAttribute;
                    ");
                    $statement->bindValue(":$uniqueAttribute", $value);
                    $statement->execute();
                    $record = $statement->fetchObject();
                    if ($record) {
                        $this->addError($attribute, self::RULE_UNIQUE, ['field' => $attribute]);
                    }
                }
            }
        }

        return empty($this->errors);
    }

    public function addError(string $attribute, string $rule, $params = [])
    {
        $message = $this->errorMessage()[$rule] ?? '';
        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$attribute][] = $message;
    }

    public function errorMessage()
    {
        return [
            self::RULE_UNIQUE => '{field} ???? t???n t???i.',
            self::RULE_REQUIRED => 'Tr?????ng d??? li???u n??y b???t bu???c.',
            self::RULE_EMAIL => 'Tr?????ng d??? li???u n??y ph???i l?? email h???p l???.',
            self::RULE_MIN => '??t nh???t {min} k?? t???.',
            self::RULE_MAX => 'Nhi???u nh???t {max} k?? t???.',
            self::RULE_MATCH => 'Tr?????ng d??? li???u n??y ph???i tr??ng v???i {match}.',
            self::RULE_NUMBER => 'Tr?????ng d??? li???u n??y ph???i l?? d???ng s???.',
            self::RULE_INVALID_EMAIL => 'Email ch??a ???????c ????ng k??.',
            self::RULE_INVALID_ID => 'Ng?????i d??ng ch??a ???????c ????ng k??.',
            self::RULE_WRONG_PASSWORD => 'M???t kh???u kh??ng ch??nh x??c.',
        ];
    }

    public function hasError($attribute)
    {
        return $this->errors[$attribute] ?? false;
    }

    public function getFirstError($attribute)
    {
        return $this->errors[$attribute][0] ?? false;
    }
}