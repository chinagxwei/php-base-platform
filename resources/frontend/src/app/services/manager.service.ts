import {Injectable} from '@angular/core';
import {HttpReprint} from "../util/http.reprint";

import {ADMIN_ACTION_LOG, MANAGER_DELETE, MANAGER_ITEMS, MANAGER_SAVE, MANAGER_VIEW} from "../config/url.config";
import {ActionLog, AuthenticationRequest, ServerManager, UpdateUserInfoRequest} from "../entity/user";
import {Paginate} from "../entity/server-response";

@Injectable({
  providedIn: 'root'
})
export class ManagerService {

  constructor(private http: HttpReprint) {
  }

  public items<T>(page: number = 1) {
    return this.http.httpPost<T>(`${MANAGER_ITEMS}?page=${page}`)
  }

  public save(user: AuthenticationRequest | UpdateUserInfoRequest) {
    return this.http.httpPost(MANAGER_SAVE, user)
  }

  public view(id: number) {
    return this.http.httpPost<ServerManager>(MANAGER_VIEW, {id})
  }

  public delete(id: number) {
    return this.http.httpPost(MANAGER_DELETE, {id})
  }

  public actionLog(page: number = 1) {
    return this.http.httpPost<Paginate<ActionLog>>(`${ADMIN_ACTION_LOG}?page=${page}`)
  }
}
