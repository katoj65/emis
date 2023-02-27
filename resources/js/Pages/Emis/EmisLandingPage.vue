<template>
    <div>
        hi it me {{ urlemis }}
        <div>
            <b-embed
                type="iframe"
                aspect="16by9"
                :src="urlemis + '/resource/js/Pages/Emis/emis.html'"
                allowfullscreen
            ></b-embed>
        </div>
    </div>
</template>

<script>
export default {
    props: ["urlemis"]
};
</script>

<style scoped>
@import "/css/windows/assets/css/animate-custom.css";
@import "/css/windows/assets/css/reponsive.css";
@import "/css/windows/assets/css/responsiveslides.css";
@import "/css/windows/assets/css/colors.css";
@import "/css/windows/assets/css/style.css";
@import "/css/windows/assets/css/font-awesome-4-menus/css/font-awesome.min.css";
</style>
