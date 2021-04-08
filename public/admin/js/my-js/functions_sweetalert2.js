const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timerProgressBar: true,
    timer: 5000,
    padding: '2rem',
});

function confirmObj(text, icon, confirmText) {
    return {
        position    : 'center',
        title       : 'Thông báo!',
        text        : text,
        icon        : icon,
        showCancelButton    : true,
        confirmButtonColor  : '#3085d6',
        cancelButtonColor   : '#d33',
        confirmButtonText   : confirmText,
        cancelButtonText    : 'Hủy',
    };
};

function confirmObjManyButton() {
    return {
        position            : 'center',
        title               : 'Lựa chọn hình thức muốn Xóa ?',
        icon                : 'warning',
        width               : 700,
        showCloseButton     : false,
        showConfirmButton   : true,
        showDenyButton      : true,
        showCancelButton    : true,
        confirmButtonText   : `Books & Category`,
        denyButtonText      : `Category`,
        cancelButtonText    : `Cancel`,
        confirmButtonColor  : '#3085d6',
        denyButtonColor     : '#3085d6',
        cancelButtonColor   : '#d33',
    };
};

function confirmObjPassword() {
    return {
        title               : 'Enter your password',
        input               : 'password',
        inputLabel          : 'Password',
        inputPlaceholder    : 'Enter your password',
        inputAttributes     : 
        {
            maxlength       : 15,
            autocapitalize  : 'off',
            autocorrect     : 'off'
        }
    }
};

function randomString() {
    var stringRandom = Math.random().toString(36).slice(-10);
    return stringRandom;
}

function showNotify($element, $type = 'success-update') {
    switch ($type) {
        case 'success-update':
            $element.notify('Cập nhật thành công!', {
                className: 'success',
                position: 'top center',
            });
            break;
    }
}

function showToast(type, action) {
    let message = '';
    switch (action) 
    {
        case 'update':                          message = 'Cập nhật thành công!';                   break;
        case 'bulk-action-not-selected-action': message = 'Vui lòng chọn action cần thực hiện!';    break;
        case 'bulk-action-not-selected-row':    message = 'Vui lòng chọn ít nhất 1 dòng dữ liệu!';  break;
    }

    Toast.fire
    ({
        icon    : type,
        title   : ' ' + message,
    });
}
