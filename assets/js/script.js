
document.addEventListener('DOMContentLoaded', () => {
    const encryptButton = document.getElementById('encryptButton');
    const decryptButton = document.getElementById('decryptButton');
    const copyButton = document.getElementById('copyButton');
    const inputText = document.getElementById('inputText');
    const resultTitle = document.getElementById('resultTitle');
    const noResult = document.getElementById('noResult');
    const getResult = document.getElementById('get-result');

    const encryptText = (text) => {
        return text
            .replace(/e/g, 'enter')
            .replace(/i/g, 'imes')
            .replace(/a/g, 'ai')
            .replace(/o/g, 'ober')
            .replace(/u/g, 'ufat');
    };

    const decryptText = (text) => {
        return text
            .replace(/enter/g, 'e')
            .replace(/imes/g, 'i')
            .replace(/ai/g, 'a')
            .replace(/ober/g, 'o')
            .replace(/ufat/g, 'u');
    };

    const updateResult = (text) => {
        if (text) {
            resultTitle.textContent = text;
            noResult.classList.add("hidden")
            getResult.classList.remove("hidden")
        } else {
            resultTitle.textContent = 'Nenhuma mensagem encontrada';
            getResult.classList.add("hidden")
            noResult.classList.remove("hidden")
        }
    };

    encryptButton.addEventListener('click', () => {
        const encrypted = encryptText(inputText.value);
        updateResult(encrypted);
    });

    decryptButton.addEventListener('click', () => {
        const decrypted = decryptText(inputText.value);
        updateResult(decrypted);
    });

    copyButton.addEventListener('click', () => {
        navigator.clipboard.writeText(resultTitle.textContent)
            .then(() => alert('Texto copiado para a área de transferência!'))
            .catch(err => console.error('Erro ao copiar o texto: ', err));
    });
});
