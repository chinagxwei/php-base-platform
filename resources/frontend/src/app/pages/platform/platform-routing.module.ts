import {RouterModule, Routes} from '@angular/router';
import {NgModule} from '@angular/core';
import {LayoutComponent} from "./layout/layout.component";
import {AdminGuard} from "../../guard/admin.guard";
import {DashboardComponent} from "./layout/content/dashboard/dashboard.component";
import {RoleComponent} from "./layout/content/role/role.component";
import {ActionLogComponent} from "./layout/content/action-log/action-log.component";
import {NavigationComponent} from "./layout/content/navigation/navigation.component";
import {ManagerComponent} from "./layout/content/manager/manager.component";

const platformRoutes: Routes = [
  {
    path: '',
    component: LayoutComponent,
    canActivate: [AdminGuard],
    children: [
      {
        path: '',
        canActivateChild: [AdminGuard],
        children:[
          {path: '', component: DashboardComponent},
          {path: 'role', component: RoleComponent},
          {path: 'action-log', component: ActionLogComponent},
          {path: 'navigation', component: NavigationComponent},
          {path: 'manager', component: ManagerComponent},
        ]
      }
    ]
  }
];

@NgModule({
  imports: [
    RouterModule.forChild(platformRoutes)
  ],
  exports: [
    RouterModule
  ]
})
export class PlatformRoutingModule {
}
