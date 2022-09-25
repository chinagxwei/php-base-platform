import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LayoutComponent } from './layout/layout.component';
import { RoleComponent } from './layout/content/role/role.component';
import { ManagerComponent } from './layout/content/manager/manager.component';
import { ActionLogComponent } from './layout/content/action-log/action-log.component';
import { NavigationComponent } from './layout/content/navigation/navigation.component';
import { DashboardComponent } from './layout/content/dashboard/dashboard.component';
import {ResetPasswordComponent} from "./layout/content/reset-password/reset-password.component";
import {NzModalModule, NzModalService} from "ng-zorro-antd/modal";
import {NzMessageService} from "ng-zorro-antd/message";
import {NzLayoutModule} from "ng-zorro-antd/layout";
import {NzMenuModule} from "ng-zorro-antd/menu";
import {NzIconModule} from "ng-zorro-antd/icon";
import {RouterLinkActive, RouterOutlet} from "@angular/router";
import {PlatformRoutingModule} from "./platform-routing.module";
import {NzTableModule} from "ng-zorro-antd/table";
import {NzDividerModule} from "ng-zorro-antd/divider";
import {NzFormModule} from "ng-zorro-antd/form";
import {ReactiveFormsModule} from "@angular/forms";
import {NzTransferModule} from "ng-zorro-antd/transfer";
import {NzButtonModule} from "ng-zorro-antd/button";
import {DragDropModule} from "@angular/cdk/drag-drop";
import {NzInputModule} from "ng-zorro-antd/input";
import {NzSelectModule} from "ng-zorro-antd/select";




@NgModule({
  declarations: [
    LayoutComponent,
    RoleComponent,
    ManagerComponent,
    ActionLogComponent,
    NavigationComponent,
    DashboardComponent,
    ResetPasswordComponent
  ],
    imports: [
        CommonModule,
        PlatformRoutingModule,
        NzLayoutModule,
        NzMenuModule,
        NzIconModule,
        RouterOutlet,
        RouterLinkActive,
        NzTableModule,
        NzDividerModule,
        NzModalModule,
        NzFormModule,
        ReactiveFormsModule,
        NzTransferModule,
        NzButtonModule,
        DragDropModule,
        NzInputModule,
        NzSelectModule,
    ],
  providers: [NzModalService, NzMessageService]
})
export class PlatformModule { }
