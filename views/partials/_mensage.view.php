<?php if ($mensage = flash()->get('mensage')) : ?>
    <div class="border-green-600 bg-green-700 text-green-400 px-4 py-1 mt-5 rounded-md text-sm font-bold">
        <?= $mensage ?>
    </div>
<?php endif; ?>