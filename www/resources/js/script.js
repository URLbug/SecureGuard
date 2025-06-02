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
        const uploadFile = document.getElementById('uploadFile');
        const previewImage = document.getElementById('previewImage');
        const imagePreview = document.getElementById('imagePreview');
        const removeImage = document.getElementById('removeImage');
        const filepath = document.querySelector('[name=filepath]');
        const uploadContainer = document.getElementById('uploadContainer');

        // Обработка выбора файла
        uploadFile?.addEventListener('change', function(e) {
            if (this.files && this.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                }

                reader.readAsDataURL(this.files[0]);
            }
        });

        // Удаление изображения
        removeImage?.addEventListener('click', function() {
            previewImage.src = '';
            filepath.value = '';
            imagePreview.classList.add('hidden');
            uploadFile.value = '';
        });

        // Drag and drop функционал
        uploadContainer?.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('border-blue-500', 'bg-blue-50');
        });

        uploadContainer?.addEventListener('dragleave', function() {
            this.classList.remove('border-blue-500', 'bg-blue-50');
        });

        uploadContainer?.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('border-blue-500', 'bg-blue-50');

            if (e.dataTransfer.files && e.dataTransfer.files[0]) {
                uploadFile.files = e.dataTransfer.files;

                // Триггерим событие change
                const event = new Event('change');
                uploadFile.dispatchEvent(event);
            }
        });
    },

    deleteElement: function() {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const uri = this.getAttribute('data-href');
                const row = this.closest('tr');  // Находим родительскую строку таблицы
                const token = document.querySelector('meta[name="csrf-token"]').content;

                fetch(uri, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                    .then(response => {
                        if (!response.ok) throw new Error('Network error');
                        return response.json();
                    })
                    .then(json => {
                        if (!json.success) {
                            throw new Error('Delete failed');
                        }

                        row.style.opacity = '0';
                        setTimeout(() => row.remove(), 300);

                        alert('Элемент был удален успешно!');
                    })
                    .catch(error => {
                        console.log(error)
                        alert('Не удалось удалить элемент');
                    });
            });
        });
    }

}

window.addEventListener('DOMContentLoaded', function(){
    if(!window.location.pathname.includes('/admin') && !window.location.pathname.includes('/login')) {
        modal.service();
    }

    if(window.location.pathname.includes('/admin')) {
        admin.uploadIMG();
        admin.deleteElement()
    }
});
