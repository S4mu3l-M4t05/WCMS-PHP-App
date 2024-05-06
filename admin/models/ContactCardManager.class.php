<?php
class ContactCardManager extends DbConnect {

    public function getAllContactCards() {
        // Retrieve contact us information from the database and return as an array
        $query = $this->db->query('SELECT * FROM contact_cards');
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function updateContactCard(ContactCard $contactCard) {
        $id = $contactCard->getId();
        $icon = $contactCard->getIcon();
        $title = $contactCard->getTitle();
        $text = $contactCard->getText();
        $size = $contactCard->getSize();

        $query = "UPDATE contact_cards SET ";
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
        if (!empty($size)) {
            $setClauses[] = "size = :size";
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
            if (!empty($size)) {
                $stmt->bindParam(':size', $size);
            }

            $result = $stmt->execute();

            return $result;
        }
    }
}