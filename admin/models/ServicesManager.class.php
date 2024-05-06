<?php
class ServicesManager extends DbConnect {
    public function getServicesData() {
        // Retrieve all services data from the database and return them as an array
        $query = $this->db->query('SELECT * FROM services');
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateServicesData(Services $services) {
        // Update the services data in the database using the Services object
        $sectionTitle = $services->getSectionTitle();
        $sectionSubheader = $services->getSectionSubheader();
        $cardTitles = [];
        $cardTexts = [];

        for ($i = 1; $i <= 6; $i++) {
            $cardTitles[$i - 1] = $services->getCardTitle($i);
            $cardTexts[$i - 1] = $services->getCardText($i);
        }

        $query = "UPDATE services SET ";
        $setClauses = [];

        if (!empty($sectionTitle)) {
            $setClauses[] = "section_title = :sectionTitle";
        }
        if (!empty($sectionSubheader)) {
            $setClauses[] = "section_subheader = :sectionSubheader";
        }

        for ($i = 1; $i <= 6; $i++) {
            if (!empty($cardTitles[$i - 1])) {
                $setClauses[] = "card_title{$i} = :cardTitle{$i}";
            }
            if (!empty($cardTexts[$i - 1])) {
                $setClauses[] = "card_text{$i} = :cardText{$i}";
            }
        }

        if (!empty($setClauses)) {
            $query .= implode(', ', $setClauses);
        }

        $stmt = $this->db->prepare($query);

        if (!empty($sectionTitle)) {
            $stmt->bindParam(':sectionTitle', $sectionTitle);
        }
        if (!empty($sectionSubheader)) {
            $stmt->bindParam(':sectionSubheader', $sectionSubheader);
        }

        for ($i = 1; $i <= 6; $i++) {
            if (!empty($cardTitles[$i - 1])) {
                $stmt->bindParam(":cardTitle{$i}", $cardTitles[$i - 1]);
            }
            if (!empty($cardTexts[$i - 1])) {
                $stmt->bindParam(":cardText{$i}", $cardTexts[$i - 1]);
            }
        }

        $result = $stmt->execute();

        return $result;
    }

    public function getServicesDataById($id) {
        $query = "SELECT * FROM services WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $servicesData = $stmt->fetch(PDO::FETCH_ASSOC);
        $servicesPage = new Services($servicesData);
        return $servicesPage;
    }
}
