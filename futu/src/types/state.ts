import { BirthDate, Customer } from "./customer";

// types/state.ts
export default interface State {
  theme: string;
  customer: Customer;
  birthDate: BirthDate;
  serverErrors: string[];
}
