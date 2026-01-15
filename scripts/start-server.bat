@echo off
echo 正在启动本地预览服务器...
echo.
echo 优化版页面将在浏览器中打开
echo 访问地址: http://localhost:8000/index-optimized.html
echo.
echo 按 Ctrl+C 停止服务器
echo.

REM 使用 Python 启动简单的 HTTP 服务器
python -m http.server 8000

pause