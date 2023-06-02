// Form validation

function Validation(options) {
    // Tạo biến lưu tất cả rule
    let allRules = {}
    // Ham validate
    function validate(inputElement, rule) {
        // Biên này để lưu message lỗi khi có
        let errorMessage;
        // Biến này để lưu thẻ span lỗi của input mình blur vào
        const errorElement = inputElement.parentElement.querySelector(options.errorMessage);
        // vòng lập này để chạy các rule của selector input đó
        for (const key of allRules[rule.selector]) {
            errorMessage = key(inputElement.value);
            // Nếu có lỗi thì thoát vòng lập
            if (errorMessage) break;
        }
        // Kiểm tra điều kiện khi có message lỗi thì xử lí thế nào
        if (errorMessage) {
            errorElement.innerText = errorMessage
            inputElement.parentElement.classList.add('invalid');
        } else {
            errorElement.innerText = ''
            inputElement.parentElement.classList.remove('invalid');
        }
        return !errorMessage;

    }


    // Biến này để lấy đúng form cần invalid
    const formElement = document.querySelector(options.form);
    if (formElement) {
        // Xử lí sự kiện submit trên form
        formElement.onsubmit = (e) => {
            e.preventDefault();
            // biene formValid de kiem tra xem co input nao chua duoc success hay khong
            let formValid = true;
            options.rules.forEach((rule) => {
                const inputElement = formElement.querySelector(rule.selector);
                let isValid = validate(inputElement, rule)
                if (!isValid) {
                    formValid = false;
                }
            })



            if (formValid) {
                if (typeof options.onSubmit === 'function') {
                    const enableInput = formElement.querySelectorAll('input[name]:not([disabled])');
                    const formValue = Array.from(enableInput).reduce((values, input) => {
                        return (values[input.name] = input.value) && values;
                    }, {})
                    options.onSubmit(formValue);

                }

            }
        }


        // Vòng lập để lập các rule đã tạo trong config
        options.rules.forEach((rule) => {
            // Xét value cho các key của rule là 1 mảng
            // Key nào trùng thì sẽ push vào cùng 1 mảng để trả về các rule của 1 input
            if (Array.isArray(allRules[rule.selector])) {
                allRules[rule.selector].push(rule.test);
            } else {
                allRules[rule.selector] = [rule.test];
            }

            // Trỏ đến thẻ input 
            const inputElement = formElement.querySelector(rule.selector);
            if (inputElement) {
                // Xu li Khi chua nhap du lieu
                inputElement.onblur = () => {
                    validate(inputElement, rule)
                }
                // Xu li khi dang nhap du lieu
                inputElement.oninput = () => {
                    if (inputElement.value.trim()) {
                        const errorElement = inputElement.parentElement.querySelector(options.errorMessage);
                        errorElement.innerText = ''
                        inputElement.parentElement.classList.remove('invalid');
                    }
                }
            }
        })

    }

}


Validation.isRequired = (selector, message) => {
    return {
        selector,
        test(value) {
            return value.trim() ? undefined : message || 'Vui lòng nhập trường này'
        }
    }
}
Validation.isEmail = (selector, message) => {
    return {
        selector,
        test(value) {
            const regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : message || 'Vui lòng nhập đúng định dạng email'
        }
    }
}

Validation.minLength = (selector, min, message) => {
    return {
        selector,
        test(value) {
            return value.length >= min ? undefined : message || 'Vui lòng nhập trên ' + min + ' ký tự'
        }
    }
}

Validation.maxLength = (selector, max, message) => {
    return {
        selector,
        test(value) {
            return value.length <= max ? undefined : message || 'Vui lòng nhập dưới ' + max + ' ký tự'
        }
    }
}
// Kiểm tra đúng định dạng phone không 
Validation.isNumber = (selector, message) => {
    return {
        selector,
        test(value) {
            const regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            return regex.test(value) ? undefined : message || 'Vui lòng nhập đúng định dạng số điện thoại   '
        }
    }
}
// Kiểm tra số điện thoại dài 11 số
Validation.phoneLength = (selector, phoneLength, message) => {
    return {
        selector,
        test(value) {
            return value.length == phoneLength ? undefined : message || 'Vui lòng nhập đúng ' + phoneLength + ' số'
        }
    }
}
Validation.isConfirm = (selector, confirmValue, message) => {
    return {
        selector,
        test(value) {
            return value == confirmValue() ? undefined : message || 'Gía trị nhập lại không chính xác'
        }
    }
}



