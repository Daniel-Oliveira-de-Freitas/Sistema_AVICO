<div>
    <script>
        !(function() {
            let e = document.createElement("script"),
                t = document.head || document.getElementsByTagName("head")[0];
            (e.src =
                "https://cdn.jsdelivr.net/npm/rasa-webchat@1.0.1/lib/index.js"),
            // Replace 1.x.x with the version that you want
            (e.async = !0),
            (e.onload = () => {
                window.WebChat.default({
                        title: "AVICOBOT",
                        customData: {
                            language: "en"
                        },
                        socketUrl: "http://localhost:5005",
                        // add other props here
                    },
                    null
                );
            }),
            t.insertBefore(e, t.firstChild);
        })();
    </script>
</div>
