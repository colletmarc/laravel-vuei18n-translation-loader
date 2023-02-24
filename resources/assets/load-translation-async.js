export async function loadTranslationAsync(translation, i18n) {
    let messages = {};

    for (const values of translation) {
        await fetch('/translations/' + values)
            .then(response => response.json())
            .then(responseJSON => {
                messages = {...messages, ...responseJSON}
            })
    }

    i18n.global.setLocaleMessage(i18n.global.locale, messages)
}
