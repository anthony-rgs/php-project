class Verification {
  static verify(fieldSelector, criterions) {
    const errors = {
      allowEmpty: 'Vous devez renseigner ce champ.',
      minLength:
        'Votre {inputName} doit contenir au minimum {minLength} caractères.',
      isNotTheSame: 'Les ... ne sont pas pareil',
    }

    const fieldElement = document.querySelector(fieldSelector)

    const { minLength, allowEmpty, clearOnError, isTheSameAs } = criterions

    if (!allowEmpty && fieldElement.value === '') {
      fieldElement.classList.add('input--error')

      return fieldElement.dataset.emptyerror || errors.allowEmpty
    }

    if (minLength > fieldElement.value.length) {
      fieldElement.classList.add('input--error')

      if (clearOnError) fieldElement.value = ''

      return (
        fieldElement.dataset.minlengtherror ||
        errors.minLength
          .replace('{inputName}', fieldElement.placeholder.toLowerCase())
          .replace('{minLength}', minLength)
      )
    }

    if (isTheSameAs) {
      const isTheSameAsElement = document.querySelector(isTheSameAs)

      if (fieldElement.value !== isTheSameAsElement.value) {
        fieldElement.classList.add('input--error')
        if (clearOnError) fieldElement.value = ''

        return fieldElement.dataset.confirmerror || errors.isNotTheSame
      }
    }

    fieldElement.classList.remove('input--error')
    return ''
  }

  static inject(error, errorSelector) {
    const errorElement = document.querySelector(errorSelector)

    errorElement.innerText = error
  }
}

export default Verification
