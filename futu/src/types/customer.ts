export interface BirthDate {
  day: string;
  month: string;
  year: string;
}

export interface Customer {
  firstName: string;
  lastName: string;
  birthDate: string;
  image: File | null;
  phoneNumber: string;
  address: string;
  city: string;
  state: string;
  country: string;
  email: string;
  password: string;
  passwordComfirm: string;
}
