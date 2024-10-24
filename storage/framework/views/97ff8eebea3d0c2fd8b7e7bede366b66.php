<div>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Units for <?php echo e($property->name); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <div class="mb-4 flex justify-between items-center">
                    <input wire:model.debounce.300ms="search" type="text" placeholder="Search units..." class="px-4 py-2 border rounded-md">
                    <a href="<?php echo e(route('units.create', $property->id)); ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add New Unit
                    </a>
                </div>
                    <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
                        <div class="px-4 py-2 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                            <?php echo e(session('message')); ?>

                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <table class="min-w-full bg-white">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Property Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Unit Number</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Bedrooms</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Bathrooms</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Rent Amount</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Manage Utilities</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500"><?php echo e($property->name); ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500"><?php echo e($unit->unit_number); ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500"><?php echo e($unit->bedrooms); ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500"><?php echo e($unit->bathrooms); ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500"><?php echo e($unit->rent_amount); ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500"><?php echo e($unit->status); ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <a href="<?php echo e(route('unit.utilities', ['unit' => $unit->id])); ?>" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Manage Utilities
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <a href="<?php echo e(route('units.edit', ['propertyId' => $property->id, 'unitId' => $unit->id])); ?>" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                                <button wire:click="confirmUnitDeletion(<?php echo e($unit->id); ?>)" class="text-red-600 hover:text-red-900">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>

                <div class="mt-4">
                    <?php echo e($units->links()); ?>

                </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/codelab/Desktop/Projects/LaravelGarage/RentalAgency/resources/views/livewire/units/unit-list.blade.php ENDPATH**/ ?>