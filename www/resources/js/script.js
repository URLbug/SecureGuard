const modal = {
    setCursorPosition: function (pos, elem) {
        elem.focus();
        if (elem.setSelectionRange) elem.setSelectionRange(pos, pos);
        else if (elem.createTextRange) {
            let range = elem.createTextRange();
            range.collapse(true);
            range.moveEnd('character', pos);
            range.moveStart('character', pos);
            range.select();
        }
    },

    maskPhone: function (event) {
        const input = document.getElementById('phone');
        const mask = '+7 (___) ___-__-__';

        let i = 0;

        const def = mask.replace(/\D/g, '');

        let val = this.value.replace(/\D/g, '');

        if (def.length >= val.length) val = def;

        this.value = mask.replace(/./g, function(a) {
            if (/[_\d]/.test(a) && i < val.length) return val.charAt(i++);
            else if (i >= val.length) return '';
            else return a;
        });

        // Set cursor position
        let cursorPos = this.value.indexOf('_');
        if (cursorPos === -1) cursorPos = this.value.length;

        this.setCursorPosition(cursorPos, this);
    },

    service: function(){
        function closeAllModals() {
            document.querySelectorAll('[id$="Modal"]').forEach(modal => {
                if(modal.id === 'closeBtnModal') {
                    const modal = document.getElementById('modal');

                    modal.classList.add('hidden');

                    return;
                }

                modal.classList.add('hidden');
            });
        }

        const modal = document.getElementById('modal');
        const form = document.querySelector('form');
        const successModal = document.getElementById('successModal');
        const errorModal = document.getElementById('errorModal');
        const phone = document.getElementById('phone');
        // const closeButtons = document.querySelectorAll('#closeModal, #cancelBtn');

        document.querySelectorAll('.service-btn').forEach(btn => {
            btn?.addEventListener('click', () => {
                document.getElementById('serviceField').value = btn.getAttribute('data-service-type');
                modal.classList.remove('hidden');
            });
        });

        // Навешиваем обработчики закрытия
        document.querySelectorAll('[id^="close"]').forEach(btn => {
            btn?.addEventListener('click', closeAllModals);
        });

        // Закрытие по клику вне модалки
        window.addEventListener('click', (e) => {
            if(e.target.matches('.fixed')) modal.classList.add('hidden');
        });

        // Маска для номера телефона
        phone?.addEventListener('input', this.maskPhone);

        phone?.addEventListener('focus', function() {
            if (this.value.length === 0) this.value = '+7 (';
            setTimeout(() => {
                let pos = this.value.indexOf('_');
                if (pos === -1) pos = this.value.length;
            }, 0);
        });

        phone?.addEventListener('blur', function() {
            if (this.value === '+7 (' || this.value.length < 18) {
                this.value = '';
            }
        });

        form?.addEventListener('submit', async (e) => {
            e.preventDefault();

            try {
                await fetch('/api/submit', {
                    method: 'POST',
                    body: new FormData(modal)
                });

                modal.classList.add('hidden');
                successModal.classList.remove('hidden');
                form.reset();

            } catch (error) {
                // Если ошибка
                modal.classList.add('hidden');
                errorModal.classList.remove('hidden');
            }
        });
    }
}

const admin = {
    uploadIMG: function() {
        const uploadFileInput = document.getElementById('uploadFile');
        const previewImage = document.getElementById('previewImage');
        const uploadBtn = document.getElementById('uploadBtn');

        uploadBtn?.addEventListener('click', () => {
            uploadFileInput.click();
        });

        uploadFileInput?.addEventListener('change', () => {
            const file = uploadFileInput.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = e => {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                previewImage.src = '';
                previewImage.classList.add('hidden');
                this.value = '';
                alert('Пожалуйста, выберите файл изображения.');
            }
        });
    }
}

window.addEventListener('DOMContentLoaded', function(){
    if(!window.location.pathname.includes('/admin'))
        modal.service();

    admin.uploadIMG();
});
