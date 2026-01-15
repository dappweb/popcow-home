# Popcow 项目结构说明

## 📁 项目目录结构

```
popcow-home/
├── README.md                    # 项目主要说明文档
├── index.html                   # 主页面文件 (重新设计的应用引流页面)
├── assets/                      # 静态资源目录
│   ├── logo.jpg                 # 网站 Logo
│   ├── mouth-closed.jpg         # 奶牛闭合嘴图片
│   ├── mouth-open-click.jpg     # 奶牛张嘴点击图片
│   └── ...                      # 其他图片资源
├── docs/                        # 项目文档目录
│   ├── Popcow-Whitepaper.md     # Popcow 技术白皮书
│   ├── DEPLOYMENT.md            # 部署说明
│   ├── DEPLOYMENT_GUIDE.md      # 部署指南
│   ├── FUNCTIONAL_AVAILABILITY_REPORT.md  # 功能可用性报告
│   ├── FUNCTION_REVIEW.md       # 功能审查
│   ├── GITBOOK_SETUP.md         # GitBook 设置
│   ├── GITBOOK_STATUS.md        # GitBook 状态
│   ├── IMPORT_NOW.md            # 导入说明
│   ├── PRODUCTION_CHECKLIST.md  # 生产检查清单
│   ├── PRODUCTION_FEASIBILITY_REPORT.md  # 生产可行性报告
│   ├── PRODUCTION_QUICK_START.md # 生产快速开始
│   ├── SETUP_GUIDE.md           # 设置指南
│   ├── TASKS.md                 # 任务跟踪
│   ├── Project Popcow：点击挖矿模因币的深度战略审计报告.md
│   └── 点击挖矿模因币平台战略规划书.md
├── backup/                      # 备份文件目录
│   ├── index-backup.html        # 主页面备份
│   └── index-optimized.html     # 优化版本备份
├── config/                      # 配置文件目录
│   ├── deploy.bat               # 部署脚本
│   └── wrangler.toml            # Cloudflare 配置
├── scripts/                     # 📜 脚本文件目录
│   ├── counter-redis.php        # Redis 计数器后端
│   └── start-server.bat         # 启动服务器脚本
├── dist/                        # 📦 构建输出目录
├── .git/                        # Git 版本控制
├── .kiro/                       # Kiro 配置
└── .vscode/                     # VS Code 配置
```

## 🎯 项目概述

Popcow 是一个基于模因文化的去中心化代币项目，主要特点：

- **点击挖矿**: 全球首创点击即收益的模因币
- **应用引流**: 首页为 https://app.popcow.xyz/ 应用提供流量入口
- **玩法教育**: 清晰的游戏规则和收益机制说明
- **社区驱动**: 强调共识价值和用户参与

## 🚀 快速开始

### 启动本地服务器
```bash
# 使用启动脚本
cd scripts
start-server.bat

# 或手动启动
python -m http.server 8000
```

### 访问地址
- **主页**: http://localhost:8000/index.html
- **应用**: https://app.popcow.xyz/

## 📋 核心功能

### 首页功能
- ✅ 多语言支持 (中/英文)
- ✅ 点击互动演示
- ✅ 应用引流入口
- ✅ 收益机会展示
- ✅ 玩法教程引导
- ✅ 响应式设计

### 应用功能 (app.popcow.xyz)
- 🔄 钱包连接
- 🔄 点击挖矿
- 🔄 邀请奖励
- 🔄 排行榜系统
- 🔄 代币兑换

## 📖 文档说明

### 重要文档
- **README.md**: 项目总体介绍
- **TASKS.md**: 开发任务跟踪
- **DEPLOYMENT_GUIDE.md**: 部署指南
- **PRODUCTION_CHECKLIST.md**: 生产检查清单

### 技术文档
- **Popcow-Whitepaper.md**: 技术白皮书
- **FUNCTIONAL_AVAILABILITY_REPORT.md**: 功能状态报告
- **PRODUCTION_FEASIBILITY_REPORT.md**: 可行性分析

## ⚙️ 配置说明

### Cloudflare 配置
- `config/wrangler.toml`: Cloudflare Workers 配置

### 部署配置
- `config/deploy.bat`: 自动部署脚本

### 后端服务
- `scripts/counter-redis.php`: Redis 计数器服务
- `scripts/start-server.bat`: 本地开发服务器

## 🔄 开发工作流

### 本地开发
1. 启动本地服务器
2. 访问 http://localhost:8000
3. 修改 `index.html` 文件
4. 刷新浏览器查看效果

### 部署流程
1. 检查 `PRODUCTION_CHECKLIST.md`
2. 运行 `config/deploy.bat`
3. 验证部署结果

## 📝 维护说明

### 备份策略
- 重要文件备份在 `backup/` 目录
- 定期更新备份文件

### 文档维护
- 保持 `docs/` 目录文档更新
- 及时同步项目状态到 `TASKS.md`

### 版本控制
- 使用 Git 进行版本管理
- 重要节点打标签标记

---

**最后更新**: 2026-01-14  
**维护者**: Popcow Team
