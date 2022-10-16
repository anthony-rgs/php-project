import Verification from './lib/Verification.js'

const form = document.querySelector('.form')

form.addEventListener('submit', (e) => {
  e.preventDefault()

  Verification.inject(
    Verification.verify('.input--email', {
      allowEmpty: false,
    }),
    '.error--email',
  )

  Verification.inject(
    Verification.verify('.input--password', {
      allowEmpty: false,
      minLength: 8,
      clearOnError: true,
    }),
    '.error--password',
  )

  Verification.inject(
    Verification.verify('.input--confirm-password', {
      allowEmpty: false,
      clearOnError: true,
      isTheSameAs: '.input--password',
    }),
    '.error--confirm-password',
  )

  let verificationCounter = 0
  const inputs = document.querySelectorAll('.input')
  for (let i = 0; i < inputs.length; i++) {
    if (!inputs[i].classList.contains('input--error')) verificationCounter += 1
  }

  if (verificationCounter === inputs.length) form.submit()
})
