export default {
    data() {
        return {
            items: {}
        }

    },
    methods: {
        add(item) {
            return this.items.push(item);
        },
        remove(index) {
            return this.items.splice(index, 1);
        }
    }
}