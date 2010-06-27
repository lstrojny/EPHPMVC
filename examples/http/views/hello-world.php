<h1>Hello <?= $e($customer->getName()) ?></h1>
<p>GET[get]: <?= $e($get) ?></p>
<p>POST[]:</p>
<ul>
    <? foreach ($post as $k => $v): ?>
        <li><?= $e($k) . $e(' => ') . $e($v) ?></li>
    <? endforeach ?>
</ul>
