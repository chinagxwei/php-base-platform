import {Navigation} from "./navigation";

export class Role {
  // @ts-ignore
  id?: number;
  // @ts-ignore
  role_name: string
  created_at?: string;
  updated_at?: string;
  navigations?: Navigation[]
}
