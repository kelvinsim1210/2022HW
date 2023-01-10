108213057
沈佳龍

----------------------------------------------

server.py 是在本機掛載一個server
需要安裝套件 asyncio, websockets
如未安裝python3，請先至https://www.python.org/downloads/ 下載
安裝好python3之後 打開cmd（可至本機搜索）輸入
pip install asyncio
pip install websockets

----------------------------------------------

運行順序
首先打開cmd 輸入 ipconfig 確認本機的乙太網路 ipv4 數字
然後在 server.py 的第34行修改本機ipv4數字
在 ticTacToe2.html 的第86行修改本機ipv4的數字
修改完畢後運行 server.py
成功運行後，打開 ticTacToe2.html
當雙方都準備好後就可以點擊右上角的按鈕開始遊戲了