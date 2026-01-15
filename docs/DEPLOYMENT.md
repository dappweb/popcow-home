# Popcow 首页优化版部署指南

## 🚀 新功能特性

### 📊 数据玩法
- **实时数据看板**: 显示全球点击数、在线用户、今日新增、持币地址
- **排行榜系统**: 点击榜、连击榜、社区榜三个维度
- **限时活动**: 双倍点击积分活动，带倒计时
- **用户统计**: 个人点击数、积分、排名展示

### 🎮 互动增强
- **实时活动流**: 显示用户实时动态
- **成就系统**: 点击成就和社区成就
- **价格信息**: $POPCOW 实时价格和市场数据
- **社交分享**: 增强的分享功能

### 🚀 App 引流
- **主要入口**: 醒目的 App 入口卡片
- **浮动按钮**: 右下角固定的 App 入口
- **导航栏入口**: Header 中的 App 链接
- **功能预览**: App 功能介绍

## 📁 文件结构

```
popcow-home/
├── index-optimized.html    # 优化版首页
├── index-backup.html       # 原版备份
├── assets/                 # 图片资源
├── counter-redis.php       # 后端计数器
├── wrangler.toml          # Cloudflare 配置
├── deploy.bat             # 部署脚本
└── DEPLOYMENT.md          # 部署说明
```

## 🌐 Cloudflare Pages 部署

### 方法一：Web 界面部署

1. **准备文件**
   ```bash
   # 运行部署脚本
   deploy.bat
   ```

2. **登录 Cloudflare**
   - 访问 [Cloudflare Dashboard](https://dash.cloudflare.com)
   - 进入 Pages 部分

3. **创建项目**
   - 点击 "Create a project"
   - 选择 "Upload assets"
   - 上传 `dist` 文件夹中的所有文件

4. **配置项目**
   - 项目名称: `popcow-homepage`
   - 生产分支: `main`

5. **部署完成**
   - 获得 Cloudflare Pages URL
   - 可以绑定自定义域名

### 方法二：Wrangler CLI 部署

1. **安装 Wrangler**
   ```bash
   npm install -g wrangler
   ```

2. **登录 Cloudflare**
   ```bash
   wrangler login
   ```

3. **部署项目**
   ```bash
   wrangler pages publish dist --project-name popcow-homepage
   ```

## ⚙️ 配置说明

### 缓存策略
- HTML 文件: 5分钟缓存
- CSS/JS 文件: 1年缓存
- 图片文件: 1年缓存

### 安全头部
- X-Frame-Options: DENY
- X-Content-Type-Options: nosniff
- Referrer-Policy: strict-origin-when-cross-origin

## 🔧 自定义配置

### 修改 App 入口地址
在 `index-optimized.html` 中搜索 `https://app.popcow.xyz` 并替换为实际地址。

### 调整活动时间
修改 JavaScript 中的 `countdownTime` 变量：
```javascript
let countdownTime = 2 * 3600 + 34 * 60 + 56; // 2:34:56 in seconds
```

### 更新价格数据源
在 `updatePrice()` 函数中集成真实的价格 API。

## 📈 性能优化

### 已实现优化
- 图片懒加载
- CSS/JS 压缩
- CDN 缓存策略
- 响应式设计

### 建议优化
- 集成真实 API 数据
- 添加 Service Worker
- 实现 WebSocket 实时更新
- 添加错误监控

## 🔗 相关链接

- [Cloudflare Pages 文档](https://developers.cloudflare.com/pages/)
- [Wrangler CLI 文档](https://developers.cloudflare.com/workers/wrangler/)
- [Popcow 官网](https://popcow.xyz)
- [Popcow App](https://app.popcow.xyz)

## 📞 技术支持

如有部署问题，请联系技术团队或查看 Cloudflare Pages 文档。