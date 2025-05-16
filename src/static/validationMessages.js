//Regex
export const passwordReg =/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{8,1024}$/
//Message
export const passwordMessage = "Password must have 1 number, 1 lower, 1 upper and 1 special character."
export const passwordMatchMessage = "Passwords must match."
export const mobileOptMessage ="Mobile OTP should be 6 digit long"
export const emailOptMessage ="Email OTP should be 6 digit long"