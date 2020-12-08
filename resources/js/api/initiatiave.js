export default {
    all() {
        return axios.get('/api/initiatives');
    },
    find(id) {
        return axios.get(`/api/initiative/${id}`);
    },
    update(id, data) {
        return axios.put(`/api/initiative/${id}`, data);
    },
};