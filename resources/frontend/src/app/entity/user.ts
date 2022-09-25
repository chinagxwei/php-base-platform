import {Role} from "./role";

export class User {
  access_token: string = '';

  token_type: string = '';

  expires_in: number = 0;

  userinfo?: Userinfo;
}

export class Userinfo {
  // @ts-ignore
  id: number;
  // @ts-ignore
  username: string;
  // @ts-ignore
  email?: string;

  email_verified_at?: string;

  role?: Role;
}

export class AuthenticationRequest {
  // @ts-ignore
  username: string;
  // @ts-ignore
  password: string;
  // @ts-ignore
  cellphone?: string
}

export class ActionLog {
  // @ts-ignore
  id: number;
  // @ts-ignore
  user_id: number;
  // @ts-ignore
  action_name: string;
  // @ts-ignore
  action_description: string;
  // @ts-ignore
  updated_at: string;
  // @ts-ignore
  created_at: string
}

export class ResetPasswordRequest {
  // @ts-ignore
  oldPassword: string;
  // @ts-ignore
  newPassword: string;
}

export class UpdateUserInfoRequest {
  role_id?: number;
}

export class ServerManager {
  // @ts-ignore
  id: number;
  // @ts-ignore
  cellphone: string
  // @ts-ignore
  username: string;
  // @ts-ignore
  email: string;
  email_verified_at?: string;
  role_id?: number;
  role?: Role;
  // @ts-ignore
  updated_at: string;
  // @ts-ignore
  created_at: string
}
