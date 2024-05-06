<?php
class ServicesCardManager extends DbConnect {

    public function getAllServicesCards() {
        // Retrieve services card information from the database and return as an array
        $query = $this->db->query('SELECT * FROM services_cards');
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function addServicesCard(ServicesCard $servicesCard) {
        $icon = $servicesCard->getIcon();
        $title = $servicesCard->getTitle();
        $text = $servicesCard->getText();

        $query = "INSERT INTO services_cards (icon, title, text) VALUES (:icon, :title, :text)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':icon', $icon);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':text', $text);

        $result = $stmt->execute();

        return $result;
    }

    public function deleteLastServicesCard() {
        $query = "SELECT id FROM services_cards ORDER BY id DESC LIMIT 1";
        $stmt = $this->db->query($query);
        $lastId = $stmt->fetchColumn();

        if ($lastId !== false) {
            $query = "DELETE FROM services_cards WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $lastId, PDO::PARAM_INT);

            $result = $stmt->execute();

            return $result;
        }
    }
    
    public function updateServicesCard(ServicesCard $servicesCard) {
        $id = $servicesCard->getId();
        $icon = $servicesCard->getIcon();
        $title = $servicesCard->getTitle();
        $text = $servicesCard->getText();

        $query = "UPDATE services_cards SET ";
        $setClauses = [];

        if (!empty($icon)) {
            $setClauses[] = "icon = :icon";
        }
        if (!empty($title)) {
            $setClauses[] = "title = :title";
        }
        if (!empty($text)) {
            $setClauses[] = "text = :text";
        }

        if (!empty($setClauses)) {
            $setClause = implode(', ', $setClauses);
            $query .= $setClause . " WHERE id = :id";

            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            if (!empty($icon)) {
                $stmt->bindParam(':icon', $icon);
            }
            if (!empty($title)) {
                $stmt->bindParam(':title', $title);
            }
            if (!empty($text)) {
                $stmt->bindParam(':text', $text);
            }

            $result = $stmt->execute();

            return $result;
        }
    }
}


