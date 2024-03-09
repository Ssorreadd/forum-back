<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute должно быть принято.',
    'accepted_if' => ':attribute должно быть принято, когда :other равно :value.',
    'active_url' => ':attribute не является допустимым URL.',
    'after' => ':attribute должно быть датой после :date.',
    'after_or_equal' => ':attribute должно быть датой после или равной :date.',
    'alpha' => ':attribute может содержать только буквы.',
    'alpha_dash' => ':attribute может содержать только буквы, цифры, дефисы и подчеркивания.',
    'alpha_num' => ':attribute может содержать только буквы и цифры.',
    'array' => ':attribute должно быть массивом.',
    'ascii' => ':attribute должно содержать только символы ASCII.',
    'before' => ':attribute должно быть датой до :date.',
    'before_or_equal' => ':attribute должно быть датой до или равной :date.',
    'between' => [
        'array' => ':attribute должно содержать от :min до :max элементов.',
        'file' => ':attribute должно быть от :min до :max килобайт.',
        'numeric' => ':attribute должно быть от :min до :max.',
        'string' => ':attribute должно содержать от :min до :max символов.',
    ],
    'boolean' => ':attribute должно быть true или false.',
    'can' => 'Поле :attribute содержит несанкционированное значение.',
    'confirmed' => 'Подтверждение :attribute не совпадает.',
    'current_password' => 'Неверный пароль.',
    'date' => ':attribute не является допустимой датой.',
    'date_equals' => ':attribute должно быть датой, равной :date.',
    'date_format' => ':attribute должно соответствовать формату :format.',
    'decimal' => ':attribute должно иметь :decimal десятичных знаков.',
    'declined' => ':attribute должно быть отклонено.',
    'declined_if' => ':attribute должно быть отклонено, когда :other равно :value.',
    'different' => ':attribute и :other должны быть разными.',
    'digits' => ':attribute должно быть :digits цифр.',
    'digits_between' => ':attribute должно быть от :min до :max цифр.',
    'dimensions' => ':attribute имеет недопустимые размеры изображения.',
    'distinct' => ':attribute содержит повторяющееся значение.',
    'doesnt_end_with' => ':attribute не может заканчиваться на одно из следующих: :values.',
    'doesnt_start_with' => ':attribute не может начинаться с одного из следующих: :values.',
    'email' => ':attribute должно быть действительным адресом электронной почты.',
    'ends_with' => ':attribute должно заканчиваться одним из следующих: :values.',
    'enum' => 'Выбранное значение для :attribute недопустимо.',
    'exists' => 'Выбранное значение для :attribute недопустимо.',
    'extensions' => 'Поле :attribute должно иметь одно из следующих расширений: :values.',
    'file' => ':attribute должно быть файлом.',
    'filled' => ':attribute должно иметь значение.',
    'gt' => [
        'array' => ':attribute должно содержать более :value элементов.',
        'file' => ':attribute должно быть больше :value килобайт.',
        'numeric' => ':attribute должно быть больше :value.',
        'string' => ':attribute должно быть больше :value символов.',
    ],
    'gte' => [
        'array' => ':attribute должно содержать :value элементов или больше.',
        'file' => ':attribute должно быть больше или равно :value килобайт.',
        'numeric' => ':attribute должно быть больше или равно :value.',
        'string' => ':attribute должно быть больше или равно :value символов.',
    ],
    'hex_color' => 'Поле :attribute должно иметь допустимый шестнадцатеричный цвет.',
    'image' => ':attribute должно быть изображением.',
    'in' => 'Выбранное значение для :attribute недопустимо.',
    'in_array' => ':attribute не существует в :other.',
    'integer' => ':attribute должно быть целым числом.',
    'ip' => ':attribute должно быть действительным IP-адресом.',
    'ipv4' => ':attribute должно быть действительным IPv4-адресом.',
    'ipv6' => ':attribute должно быть действительным IPv6-адресом.',
    'json' => ':attribute должно быть допустимой строкой JSON.',
    'lowercase' => ':attribute должно быть в нижнем регистре.',
    'lt' => [
        'array' => ':attribute должно содержать менее :value элементов.',
        'file' => ':attribute должно быть меньше :value килобайт.',
        'numeric' => ':attribute должно быть меньше :value.',
        'string' => ':attribute должно быть меньше :value символов.',
    ],
    'lte' => [
        'array' => ':attribute не должно содержать более :value элементов.',
        'file' => ':attribute должно быть меньше или равно :value килобайт.',
        'numeric' => ':attribute должно быть меньше или равно :value.',
        'string' => ':attribute должно быть меньше или равно :value символов.',
    ],
    'mac_address' => ':attribute должно быть допустимым MAC-адресом.',
    'max' => [
        'array' => ':attribute не должно содержать более :max элементов.',
        'file' => ':attribute не должно быть больше :max килобайт.',
        'numeric' => ':attribute не должно быть больше :max.',
        'string' => ':attribute не должно быть больше :max символов.',
    ],
    'max_digits' => ':attribute не должно содержать более :max цифр.',
    'mimes' => ':attribute должно быть файлом типа: :values.',
    'mimetypes' => ':attribute должно быть файлом типа: :values.',
    'min' => [
        'array' => ':attribute должно содержать как минимум :min элементов.',
        'file' => ':attribute должно быть не менее :min килобайт.',
        'numeric' => ':attribute должно быть не менее :min.',
        'string' => ':attribute должно быть не менее :min символов.',
    ],
    'min_digits' => ':attribute должно содержать как минимум :min цифр.',
    'missing' => ':attribute должно отсутствовать.',
    'missing_if' => ':attribute должно отсутствовать, когда :other является :value.',
    'missing_unless' => ':attribute должно отсутствовать, если :other не равно :value.',
    'missing_with' => ':attribute должно отсутствовать, когда :values присутствует.',
    'missing_with_all' => ':attribute должно отсутствовать, когда присутствуют :values.',
    'multiple_of' => ':attribute должно быть кратным :value.',
    'not_in' => 'Выбранное значение для :attribute недопустимо.',
    'not_regex' => 'Недопустимый формат для :attribute.',
    'numeric' => ':attribute должно быть числом.',
    'password' => [
        'letters' => 'Пароль должен содержать как минимум одну букву',
        'mixed' => 'Пароль должен содержать как минимум одну заглавную букву и одну строчную букву',
        'numbers' => 'Пароль должен содержать как минимум одну цифру',
        'symbols' => 'Пароль должен содержать как минимум один символ',
        'uncompromised' => 'Указанный пароль появился в утечке данных. Пожалуйста, выберите другой пароль',
    ],
    'present' => ':attribute должно быть присутствующим.',
    'present_if' => 'Поле :attribute должно присутствовать, если :other равно :value.',
    'present_unless' => 'Поле :attribute должно присутствовать, если :other не равно :value.',
    'present_with' => 'Поле :attribute должно присутствовать, если присутствует :values.',
    'present_with_all' => 'Поле :attribute должно присутствовать при наличии :values.',
    'prohibited' => ':attribute запрещено.',
    'prohibited_if' => ':attribute запрещено, когда :other является :value.',
    'prohibited_unless' => ':attribute запрещено, если :other не равно :values.',
    'prohibits' => ':attribute запрещает :other быть присутствующим.',
    'regex' => 'Недопустимый формат для :attribute.',
    'required' => 'Поле :attribute обязательно для заполнения.',
    'required_array_keys' => 'Поле :attribute должно содержать записи для: :values.',
    'required_if' => 'Поле :attribute обязательно, когда :other является :value.',
    'required_if_accepted' => 'Поле :attribute обязательно, когда :other принято.',
    'required_unless' => 'Поле :attribute обязательно, если :other не находится в :values.',
    'required_with' => 'Поле :attribute обязательно, когда :values присутствует.',
    'required_with_all' => 'Поле :attribute обязательно, когда :values присутствуют.',
    'required_without' => 'Поле :attribute обязательно, когда :values отсутствует.',
    'required_without_all' => 'Поле :attribute обязательно, когда нет ни одного из :values.',
    'same' => ':attribute и :other должны совпадать.',
    'size' => [
        'array' => ':attribute должно содержать :size элементов.',
        'file' => ':attribute должно быть :size килобайт.',
        'numeric' => ':attribute должно быть равно :size.',
        'string' => ':attribute должно быть равно :size символов.',
    ],
    'starts_with' => ':attribute должно начинаться с одного из следующих: :values.',
    'string' => ':attribute должно быть строкой.',
    'timezone' => ':attribute должно быть допустимой временной зоной.',
    'unique' => ':attribute уже занято.',
    'uploaded' => ':attribute не удалось загрузить.',
    'uppercase' => 'Поле :attribute должно быть в верхнем регистре.',
    'url' => 'Недопустимый формат для :attribute.',
    'ulid' => 'Поле :attribute должно быть допустимым ULID.',
    'uuid' => ':attribute должно быть допустимым UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
