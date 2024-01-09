<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>遺言書作成</title>

    <style>

        .title {
            font-size: 2em; 
            font-weight: bold; 
            font-family: 'ヒラギノ明朝 Pro', 'Hiragino Mincho Pro', serif; 
            margin-bottom: 2rem; 
        }
        .text-center {
            text-align: center;
        }
        .articles p {
            line-height: 2; 
            margin-bottom: 1rem; 
        }

        .address-name-section {
            text-align: right;
            margin-top: 6rem;
            margin-bottom: 0.5rem;
        }
        .date-section p {
            font-size: 1em; 
            margin-bottom: 0.5rem; 
        }
        #willSection {
            min-height: 500px; 
        }

/* ボタンのスタイル */
        .download-button {
            width: 200px; 
        }



</style>

    <!-- Tailwind CSSのリンク -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        let articleCount = 1;
        function addWill() {
            let asset = document.getElementById("assetSelect").value;
            let person = document.getElementById("personSelect").value;
            let articles = document.getElementById("articles");



            // 新しい条文の文章を作成
            let newArticle = document.createElement("p");
            newArticle.classList.add('article');
            newArticle.textContent = '第' + articleCount + '条 ' + '遺言者は、遺言者名義の全ての' + asset + 'を' + person + 'に相続させる';

            // 遺言書のセクションに新しい条文を追加
            articles.appendChild(newArticle);

            // 記事カウントを増やす
            articleCount++;
        }
        function sendWillToServer() {
        let willContent = document.getElementById("willSection").innerHTML;

        // Ajaxリクエストでサーバーに送信する例
        fetch('/generate-will-pdf', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ will_content: willContent })
        })
        .then(response => response.blob())
        .then(blob => {
            // PDFをダウンロードする
            let url = window.URL.createObjectURL(blob);
            let a = document.createElement('a');
            a.href = url;
            a.download = 'will.pdf';
            document.body.appendChild(a);
            a.click();
            a.remove();
        });
    }
    </script>
    

</head>
<x-admin-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Will') }}
      </h2>
  </x-slot>
<body>
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex  min-w-[300px]">

                    <!-- 左側のセクション -->
                    <div class="mr-5">
                        <h2 class="text-lg font-bold mb-2">財産の種類</h2>
                        <select id="assetSelect" class="mb-4 p-2 border rounded">
                        <option value="不動産">不動産</option>
                        <option value="建物">建物</option>
                        <option value="株式">株式</option>
                        <option value="預貯金">預貯金</option>
                        <option value="遺言に記載のない財産">遺言に記載のない財産</option>
                        </select>

                        <h2 class="text-lg font-bold mb-2">相続人</h2>
                        <select id="personSelect" class="mb-4 p-2 border rounded">
                        <option value="木村太郎">木村太郎</option>
                        <option value="木村花子">木村花子</option>
                        <option value="木村一郎">木村一郎</option>
                        <option value="木村あかね">木村あかね</option>
                        <option value="木村瑠璃">木村瑠璃</option>
                        </select>

                        <button onclick="addWill()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            決定
                        </button>
                        <br>
                        <button onclick="sendWillToServer()" style="width: 200px; height: 50px;" class="download-button bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        PDFでダウンロード
                    </button>
                    </div>

                    <!-- 右側のセクション -->
                    <div>
                        <h2 class="text-lg font-bold mb-2">遺言書</h2>
                        <div id="willSection" class="bg-gray-100 border border-gray-300 p-4 rounded">
                        <p class="text-center title">遺言書</p>
                        <!-- 遺言書の内容がここに追加される -->
                        <!-- 新しい条文はここに追加される -->
                        <div id="articles" class="articles"></div>
                        <!-- 住所と名前のセクション -->
                        <div class="address-name-section text-right mt-4">
                            <p>住所:東京都千代田区丸の内３－８－９－１０９
                            </p>
                            <p>遺言者:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                        </div>
                        <div class="date-section text-right mt-4">
                            <p>2024年01月09日</p>
                        </div>
                    </div>

                        
                    </div>


                </div>
              </div>
          </div>
      </div>
  </div>
  </body>
</x-admin-layout>
</html>
