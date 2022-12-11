document.addEventListener("DOMContentLoaded", () => {

    const ajaxSend = async (formData) => {
        const response = await fetch("search.php", {
            method: "POST",
            body: formData
        });
        if (!response.ok) {
            throw new Error(`Ошибка по адресу ${url}, статус ошибки ${response.status}`);
        }
        return await response.json();
    };

    if (document.querySelector("#formSearch")) {
        const form = document.querySelector("#formSearch");

        form.addEventListener("submit", function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            ajaxSend(formData)
                .then((response) => {
                    let resultText = document.getElementById('resultText');
                    let rowsTables = [...document.querySelectorAll('#tableData .itemData')];

                    resultText.innerText = '';
                    
                    if (response.length === 0) {
                        resultText.innerText = 'Збігів не знайдено';
                        rowsTables.forEach(e => e.removeAttribute('style'));
                    } else {
                        const searchItemId = Object.keys(response);
                        rowsTables.forEach(e => {
                            e.removeAttribute('style');
                            if (searchItemId.includes(e.querySelector('.id').textContent)) {
                                e.style.backgroundColor = 'yellow';
                            }
                        });
                    }
                    form.reset();
                })

                .catch((err) => console.error(err))
        });

    }

});