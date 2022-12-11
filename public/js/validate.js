function Validator(formSelector) {
    var _this = this;
    var formRules = {};

    function getParent(element, selector) { 
        while (element.parentElement) {
            if(element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement;
        }
    };

    var regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var regexNumber = /^[0-9]+$/;
    var validatorRules = {
        required: (value) => value ? undefined : 'Vui lòng nhập trường này!',
        email: (value) => regexEmail.test(value) ? undefined : 'Vui lòng nhập đúng định dạng email!',
        number: (value) => regexNumber.test(value) ? undefined : 'Trường này phải là số!',
        min: (min) => (value) => value.length >= min ? undefined : `Vui lòng nhập tối thiểu ${min} kí tự`,
        max: (max) => (value) => value.lenght <= max ? undefined : `Vui lòng nhập tối đa ${max} kí tự`,
    } ;

    var formElement = document.querySelector(formSelector);

    if (formElement) {
        var inputs = formElement.querySelectorAll('[name][rules]');
        for(var input of inputs) { 

            var rules = input.getAttribute('rules').split('|');

            for(var rule of rules) {
                var ruleInfo;
                var isRuleHasValue = rule.includes(':');

                if (isRuleHasValue) {
                    ruleInfo = rule.split(':');
                    rule = ruleInfo[0];
                };

                var ruleFunc = validatorRules[rule];

                if (isRuleHasValue) {
                    ruleFunc = ruleFunc(ruleInfo[1]);
                };

                if(Array.isArray(formRules[input.name])) {
                    formRules[input.name].push(ruleFunc);
                } else {
                    formRules[input.name] = [ruleFunc];
                };
            };
            // Lắng nghe sự kiện validate (blur, change, ...)
            input.onblur = handleValidate;
            input.oninput = handleClearError;
        };

        function handleValidate (e) {
            var rules = formRules[e.target.name];
            var errorMessage;

            for(var rule of rules) {
                errorMessage = rule(e.target.value);
                if (errorMessage) break;
            };

            if (errorMessage) {
                var formGroup = getParent(e.target, '.form-group');
                if (formGroup) {
                    formGroup.classList.add('invalid');
                    var formMessage = formGroup.querySelector('.form-message');
                    if (formMessage) {
                        formMessage.innerText = errorMessage;
                    } ;
                };
            };

            return !errorMessage;
            
        };

        function handleClearError (e) {
            var formGroup = getParent(e.target, '.form-group');
            if (formGroup.classList.contains('invalid')) { 
                formGroup.classList.remove('invalid');

                var formMessage = formGroup.querySelector('.form-message');
                if (formMessage) {
                    formMessage.innerText = '';
                } ;
            };
        };
    };
    if(formElement) {
        formElement.onsubmit = (e) => {
            e.preventDefault();
            var inputs = formElement.querySelectorAll('[name][rules]');
            var isValid = true;
            for(var input of inputs) { 
                if(!handleValidate({target: input})) {
                    isValid = false;
                }
            }
    
            if (isValid) { 
                if(typeof _this.onSubmit === 'function') { 
                    var enableInputs = formElement.querySelectorAll('[name]');
                    var formValues = Array.from(enableInputs).reduce((values, input) => {
                        switch(input.type) { 
                            case 'radio':
                                values[input.name] = formElement.querySelector('input[name="' + input.name + '"]:checked').value;
                                break;
                            case 'checkbox':
                                if(!input.matches(':checked')) {
                                    values[input.name] = '';
                                    return values;
                                }
                                if (!Array.isArray(values[input.name])) {
                                    values[input.name] = [];
                                } 
                                values[input.name].push(input.value);
                                break;
                            case 'file': 
                                values[input.name] = input.files;
                                break; 
                            default:
                                values[input.name] = input.value;
                        }
                        return values;
                    }, {});
                    _this.onSubmit(formValues);
                } else {
                    formElement.submit();    
                }
            }
        }
    }
};