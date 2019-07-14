<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>一覧表示</title>
		<style type="text/css">
			img {
				width: 100%;
				border-radius: 10px 10px 0 0;
				transition: .1s ease-in-out;
			}
			img:hover {
				transform: scale(1.1);
			}
			#contentInner {
				margin: 10px auto;
				padding: 5px;
				width: 90%;
				border: solid: #333;
				column-count: 5;
				column-gap: 0;
			}
			.contentBox {
				display: inline-block;
				margin: 10px;
				box-shadow: 0 0 10px #ddd;
				border-radius: 10px;
				-webkit-column-break-inside: avoid;
				page-break-inside: avoid;
				break-inside: avoid;
				transition: .1s ease-in-out;
			}
			.contentBox:hover{
				cursor: pointer;
				box-shadow: 0 0 10px #aaa;
			}
			.imageBox {
				border-radius: 10px 10px 0 0;
				overflow: hidden;
				z-index: 9999;
			}
			.title {
				margin: 5px;
				font-weight: bold;
				color: #333;
			}
			.deleteButton {
				float: right;
				border: none;
				border-radius: 0 0 10px 0;
				background: #ddd;
				color: #333;
				transition: .1s ease-in-out;
			}
			.deleteButton:hover {
				background: #aaa;
				cursor: pointer;
			}

			@media  screen and (max-width: 960px) {
				#contentInner {
					column-count: 4;
				}
			}

			@media screen and (max-width: 680px) {
				#contentInner {
					column-count: 3;
				}
			}

			@media  screen and (max-width: 480px) {
				#contentInner {
					column-count: 2;
				}
			}

		</style>
	</head>
	<body>
		<div id="contentInner">
			<?php foreach($_POST["list"] as $var){ ?>
				<div class="contentBox">
					<div class="imageBox">
						<img src="<?php echo $var["filename"]; ?>" alt="<?php echo $var["title"]; ?>">
					</div>
					<p class="title"><?php echo $var["title"]; ?></p>
					<input	type="button"
							class="deleteButton"
							onclick="location.href='./DeleteController.php?filename=<?php echo $var["filename"]; ?>'"
							value="削除"
					>
				</div>
			<?php }; ?>
		</div>
		<a href="./index.html"><<<メニュー</a>
	</body>
</html>