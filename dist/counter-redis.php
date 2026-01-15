<?php
header('Content-Type: application/json; charset=utf-8'); // 设置JSON响应头
define('MINIMUM_VALUE', 337742389);

try {
    // 创建 Redis 连接
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379); // 根据配置连接 Redis

    $counterKey = 'shared_counter'; // Redis 中存储总点击数的键名

    $action = isset($_GET['action']) ? $_GET['action'] : 'read'; // 根据前端传入的操作确定执行逻辑

    // 执行不同的操作
    if ($action === 'read') {
        // 从 Redis 获取 totalClicks，如果不存在则初始化为0
        $value = $redis->get($counterKey);
        if ($value === false) {
            $value = 0;
            $redis->set($counterKey, $value); // 初始化
        }
        echo json_encode(['status' => 'success', 'value' => (int)$value]); // 返回 current totalClicks
    } elseif ($action === 'increment') {
        // 执行 Redis 自增并返回新值
        $value = $redis->incr($counterKey);
        echo json_encode(['status' => 'success', 'value' => (int)$value]);
    } elseif ($action === 'sync') {
        // 接收前端传来的 totalClicks 值，更新 Redis 计数值
        $postData = json_decode(file_get_contents('php://input'), true); // 获取 JSON 数据
        $newTotal = isset($postData['totalClicks']) ? intval($postData['totalClicks']) : null;

        if ($newTotal !== null) {
            if ($newTotal < MINIMUM_VALUE) {
                $newTotal = MINIMUM_VALUE; // 强制设为最小值
            }
            $redis->set($counterKey, $newTotal); // 同步更新 Redis 中的计数
            echo json_encode(['status' => 'success', 'value' => $newTotal]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid totalClicks value']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    }
} catch (Exception $e) {
    // 错误处理
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>
