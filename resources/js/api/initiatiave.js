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
    storePathwayOrOutcome(initiativeId, pathwayOrOutcomeId, data) {
        return axios.post(`/api/initiative/${initiativeId}/pathway-outcome/${pathwayOrOutcomeId}`, data);
    },
    allInitiativeIndicators(initiativeId) {
        return axios.get(`/api/initiative/${initiativeId}/indicators`);
    }
};