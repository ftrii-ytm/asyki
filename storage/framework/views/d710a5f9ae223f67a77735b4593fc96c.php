<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Halaman Pengajuan
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <a href="<?php echo e(route('pengajuan.create')); ?>"
                   class="mb-4 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    + Tambah Pengajuan
                </a>

                <table class="w-full border mt-4">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">Judul</th>
                            <th class="border p-2">Jumlah</th>
                            <th class="border p-2">Status</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $pengajuans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="border p-2"><?php echo e($p->judul_pengajuan); ?></td>
                                <td class="border p-2"><?php echo e($p->jumlah); ?></td>
                                <td class="border p-2"><?php echo e($p->status); ?></td>

                                <td class="border p-2 space-x-2">

                                    
                                    <a href="<?php echo e(route('pengajuan.edit', $p->id)); ?>"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                        Edit
                                    </a>

                                    
                                    <form action="<?php echo e(route('pengajuan.destroy', $p->id)); ?>" method="POST" class="inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded"
                                            onclick="return confirm('Hapus pengajuan ini?')">
                                            Hapus
                                        </button>
                                    </form>

                                    
                                    <?php if($p->status == 'draft'): ?>
                                        <form action="<?php echo e(route('pengajuan.kirim', $p->id)); ?>" method="POST" class="inline">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit"
                                                class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">
                                                Kirim ke GA
                                            </button>
                                        </form>
                                    <?php endif; ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\CONAN\asyki\resources\views/pengajuan/index.blade.php ENDPATH**/ ?>