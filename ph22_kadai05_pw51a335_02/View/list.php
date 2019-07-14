<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>アップロード画像一覧</title>
		<style>
			img {
				width: 100px;
			}
			div {
				width: 200px;
				border: solid;
				margin-bottom: 10px;
			}
		</style>
	</head>
	<body>
		<form  method="post">
			<?php foreach($_POST["list"] as $image): ?>
				<div>
					<img src="<?php echo $image["filename"]; ?>" alt="<?php echo $image["title"]; ?>">
					<p><?php echo $image["title"]; ?></p>
					<?php if($_POST["userId"] ==  $image["account_id"]): ?>
						<button	type="submit"
								name="delete"
								class="deleteButton"
								formaction="../Controller/DeleteController.php"
								value="<?php echo $image["id"] ?>">削除</button>
						<?php if($image["publish"] == 0): ?>
							<button type="submit"
									name="public"
									formaction="../Controller/PublishController.php"
									value="<?php echo $image["id"] ?>">公開</button>
						<?php elseif($image["publish"] == 1): ?>
							<button type="submit"
									name="private"
									formaction="../Controller/PublishController.php"
									value="<?php echo $image["id"] ?>">非公開</button>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</form>
		<a href="../Controller/WelcomeController.php">メニュー</a>
	</body>
</html>