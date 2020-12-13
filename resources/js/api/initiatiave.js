export default {
    all() {
        return axios.get('/api/initiatives');
    },
    find(id) {
        return axios.get(`/api/initiative/${id}`);
    },
    update(id, data) {
        return axios.post(`/api/initiative/${id}`, data);
    },
    storeInitiativeGoalTeam(id, data) {
        return axios.post(`/api/initiative/${id}/goal-team`, data);
    },
    storeInitiativeIndicator(initiativeId, indicatorId, data) {
        return axios.post(`/api/initiative/${initiativeId}/indicator/${indicatorId}`, data);
    },
    allInitiativeIndicators(initiativeId, indicatorType) {
        return axios.get(`/api/initiative/${initiativeId}/indicators/${indicatorType}`);
    }
};