import { Routes, Route } from "react-router-dom";
import Login from "../pages/Login.tsx";

const AppRoutes = () => (
    <Routes>
        <Route path="/" element={<Login />} />
    </Routes>
);

export default AppRoutes;
