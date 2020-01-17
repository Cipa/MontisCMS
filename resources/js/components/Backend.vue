<template>
    <div class="h-screen relative overflow-y-hidden">
        <div class="xfixed xtop-0 xinset-x-0">
            <div class="w-full max-w-screen-xl relative mx-auto px-4 border border-b-4 bg-gray-100">
                <div class="flex items-center">
                    <div class="w-1/4 h-12 align-middle flex items-center">
                        <a href="#" class="font-bold text-lg text-gray-800">MontisCMS</a>
                    </div>
                    <div class="flex flex-grow">
                        <div class="flex w-full items-center align-middle h-12">
                            <ul class="flex">
                                <li class="mr-6">
                                    <a class="text-blue-500 hover:text-blue-800" href="#">Active</a>
                                </li>
                                <li class="mr-6">
                                    <a class="text-blue-500 hover:text-blue-800" href="#">Link</a>
                                </li>
                                <li class="mr-6">
                                    <a class="text-blue-500 hover:text-blue-800" href="#">Link</a>
                                </li>
                                <li class="mr-6">
                                    <a class="text-gray-400 cursor-not-allowed" href="#">Disabled</a>
                                </li>
                            </ul>
                        </div>
                        <div class="w-1/4 flex items-center justify-end">
                            <div>
                                <button class>Account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex h-full max-h-full">
            <div class="w-64 border-r-4">
                <div class="bg-teal-100 h-full max-h-full">resources</div>
            </div>
            <main class="max-h-full w-full">
                <div class="bg-teal-100 h-full">main area</div>
            </main>
        </div>
    </div>
</template>

<script>
export default {
    name: "Backend"
};
</script>
