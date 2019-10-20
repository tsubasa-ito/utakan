<template>
    <div class="container">
       <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
           <ul class="navbar-nav">
               <li class="nav-item">
                    <router-link to="/create" class="nav-link">CREATE</router-link>
               </li>
                <li class="nav-item">
                    <router-link to="/songs" class="nav-link">Songs</router-link>
               </li>
           </ul>
       </nav>
        <router-view></router-view>
    </div>
</template>

<script>
    export default{
    }
</script>
