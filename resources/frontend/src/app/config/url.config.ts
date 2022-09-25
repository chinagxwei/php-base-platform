
export const HOST = 'http://laravellocal:8888';

export const API_VERSION = 'v1';

/**
 * 用户登录
 */
export const USER_LOGIN = `${HOST}/api/${API_VERSION}/auth/login`;
/**
 * 用户登出
 */
export const USER_LOGOUT = `${HOST}/api/${API_VERSION}/auth/logout`;
/**
 * 修改密码
 */
export const USER_RESET_PASSWORD = `${HOST}/api/${API_VERSION}/auth/reset-password`;

/**
 * 用户信息
 */
export const USER_SIMPLE_INFO = `${HOST}/api/${API_VERSION}/auth/info`;

/**
 * 管理员行为日志
 */
export const ADMIN_ACTION_LOG = `${HOST}/api/${API_VERSION}/action-log/index`;

/**
 * 管理员列表
 */
export const MANAGER_ITEMS = `${HOST}/api/${API_VERSION}/manager/index`;

/**
 * 管理员详情
 */
export const MANAGER_VIEW = `${HOST}/api/${API_VERSION}/manager/view`;


/**
 * 保存管理员信息
 */
export const MANAGER_SAVE = `${HOST}/api/${API_VERSION}/manager/save`;

/**
 * 删除管理员
 */
export const MANAGER_DELETE = `${HOST}/api/${API_VERSION}/manager/delete`;

/**
 * 导航列表
 */
export const NAVIGATION_ITEMS = `${HOST}/api/${API_VERSION}/navigation/index`;

/**
 * 保存导航
 */
export const NAVIGATION_SAVE = `${HOST}/api/${API_VERSION}/navigation/save`;

/**
 * 删除导航
 */
export const NAVIGATION_DELETE = `${HOST}/api/${API_VERSION}/navigation/delete`;

/**
 * 导航排序
 */
export const NAVIGATION_SORT = `${HOST}/api/${API_VERSION}/navigation/sort-change`;

/**
 * 所有导航
 */
export const NAVIGATION_ALL_ITEMS = `${HOST}/api/${API_VERSION}/navigation/all`;

/**
 * 角色列表
 */
export const ROLE_ITEMS = `${HOST}/api/${API_VERSION}/role/index`;

/**
 * 保存角色
 */
export const ROLE_SAVE = `${HOST}/api/${API_VERSION}/role/save`;

/**
 * 角色详情
 */
export const ROLE_VIEW = `${HOST}/api/${API_VERSION}/role/view`;

/**
 * 删除角色
 */
export const ROLE_DELETE = `${HOST}/api/${API_VERSION}/role/delete`;

/**
 * 搜索角色
 */
export const ROLE_SEARCH = `${HOST}/api/${API_VERSION}/role/search`;

/**
 * 配置菜单
 */
export const ROLE_CONFIG_MENU = `${HOST}/api/${API_VERSION}/role/config-menu`;
