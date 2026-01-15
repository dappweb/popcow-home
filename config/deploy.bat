@echo off
echo 正在准备部署到 Cloudflare Pages...

REM 创建dist目录
if not exist "dist" mkdir dist

REM 复制文件到dist目录
copy index-optimized.html dist\index.html
xcopy assets dist\assets\ /E /I /Y
copy counter-redis.php dist\ /Y

echo 文件准备完成！

echo.
echo 请按照以下步骤部署到 Cloudflare Pages:
echo.
echo 1. 登录 Cloudflare Dashboard
echo 2. 进入 Pages 部分
echo 3. 点击 "Create a project"
echo 4. 选择 "Upload assets"
echo 5. 上传 dist 文件夹中的所有文件
echo 6. 设置项目名称为 "popcow-homepage"
echo 7. 点击 "Deploy site"
echo.
echo 或者使用 Wrangler CLI:
echo npm install -g wrangler
echo wrangler pages publish dist --project-name popcow-homepage
echo.
pause