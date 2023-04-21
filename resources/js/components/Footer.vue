<template>
    <v-footer color="#34726f" dark>
        <v-row justify="center" class="my-4 text-center">
            <v-col cols="12"
                >Welcome to Online Medicine Hub, your one-stop for high-quality
                medicines and healthcare products delivered right to your
                doorstep</v-col
            >
            <v-col cols="12">
                <v-btn
                    v-for="icon in icons"
                    :key="icon"
                    @click="links(icon)"
                    text
                    dark
                >
                    <v-icon>{{ icon }}</v-icon>
                </v-btn>
            </v-col>
            <v-col cols="12" class="align-center"
                >&copy; 2023 Online Medicine Hub</v-col
            >
        </v-row>
    </v-footer>
</template>

<script>
export default {
    data() {
        return {
            icons: [
                "mdi-facebook",
                "mdi-twitter",
                "mdi-instagram",
                "mdi-youtube",
            ],
        };
    },

    methods: {
        links(data) {
            if (data == "mdi-facebook") {
                window.open(
                    "https://www.facebook.com/profile.php?id=100091735458118",
                    "_blank"
                );
            } else if (data == "mdi-twitter") {
                window.open(
                    "https://www.facebook.com/profile.php?id=100091735458118",
                    "_blank"
                );
            } else if (data == "mdi-instagram") {
                window.open(
                    "https://www.instagram.com/invites/contact/?i=1o83mlg9kqqwf&utm_content=r93u9b8",
                    "_blank"
                );
            } else {
                window.open(
                    "https://www.facebook.com/profile.php?id=100091735458118",
                    "_blank"
                );
            }
        },
    },
};
</script>
