<template>
    <div>
        <h3>Users</h3>
        <ul class="list-group">
            <li v-for="user in filteredUsers" class="list-group-item d-flex justify-content-between align-items-center">
                {{ user.name }}
                <span :class="user.isActive ? 'badge-success' : 'badge-danger'" class="badge badge-primary">{{ user.isActive ? 'Active' : 'Inactive' }}</span>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            users: {
                type: Array,
                default: () => ([])
            }
        },
        data() {
            return {
                activeUsers: []
            }
        },
        computed: {
            filteredUsers() {
                return this.users.map((user) => {
                    return {
                        ...user,
                        isActive: !! this.activeUsers.find((u) => u.id === user.id)
                    };
                });
            }
        },
        mounted() {
            window.Echo.join('users')
                .here((users) => {
                    this.activeUsers = users;
                }).joining((user) => {
                    this.activeUsers.push(user)
                }).leaving((user) => {
                    const index = this.activeUsers.findIndex(u => user.id == u.id);
                    this.activeUsers.splice(index, 1);
                });
        }
    }
</script>
