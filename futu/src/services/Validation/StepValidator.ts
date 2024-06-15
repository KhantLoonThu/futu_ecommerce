import { Customer } from "./../../types/customer";
import Validation from "./Validation";

export default class StepValidator {
  static validateStepOne(customer: Customer): Record<string, string> {
    const errors: Record<string, string> = {};
    if (!customer.firstName) errors.firstName = "First Name is required";
    if (!customer.lastName) errors.lastName = "Last Name is required";
    if (!customer.birthDate) errors.birthDate = "Birth Date is required";
    if (!customer.image) errors.image = "Image is required";
    return errors;
  }

  static validateStepTwo(customer: Customer): Record<string, string> {
    const errors: Record<string, string> = {};
    if (!customer.phoneNumber) errors.phoneNumber = "Phone Number is required";
    if (!customer.address) errors.address = "Address is required";
    if (!customer.city) errors.city = "City is required";
    if (!customer.state) errors.state = "State is required";
    if (!customer.country) errors.country = "Country is required";
    return errors;
  }

  static validateStepThree(customer: Customer): Record<string, string> {
    const errors: Record<string, string> = {};
    if (!Validation.validateEmail(customer.email))
      errors.email = "Invalid email format";
    if (!Validation.passwordMinLength(customer.password, 8))
      errors.password = "Password must be at least 8 characters long";
    if (customer.password !== customer.passwordComfirm)
      errors.passwordComfirm = "Passwords do not match";
    return errors;
  }
}
