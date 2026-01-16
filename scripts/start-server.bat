@echo off
echo Starting local preview server...
echo.
echo Optimized page will open in browser
echo Access URL: http://localhost:8000/index-optimized.html
echo.
echo Press Ctrl+C to stop server
echo.

REM Start simple HTTP server using Python
python -m http.server 8000

pause