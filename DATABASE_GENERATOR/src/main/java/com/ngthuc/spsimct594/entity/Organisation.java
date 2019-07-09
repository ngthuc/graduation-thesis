package com.ngthuc.spsimct594.entity;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;

import javax.persistence.*;
import java.util.HashSet;
import java.util.Set;

@Entity
@JsonIgnoreProperties(value = { "subordinates" })
@Table(name = "organisation")
public class Organisation {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id", nullable = false)
    private Long id;

    @Column(name = "name", nullable = false)
    private String name;

	@Column(name = "english", nullable = false)
	private String english;

    @Column(name = "nickname", length = 20, nullable = false)
    private String nickname;

    @Column(name = "type", length = 20)
    private String type;

    @ManyToOne
    @JoinColumn(name="childOf")
    private Organisation parent;

    @OneToMany(fetch = FetchType.LAZY,mappedBy="parent")
    private Set<Organisation> subordinates = new HashSet<Organisation>();

    public Organisation() {}

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getEnglish() {
		return english;
	}

	public void setEnglish(String english) {
		this.english = english;
	}

	public String getNickname() {
		return nickname;
	}

	public void setNickname(String nickname) {
		this.nickname = nickname;
	}

	public String getType() {
		return type;
	}

	public void setType(String type) {
		this.type = type;
	}

	public Organisation getParent() {
		return parent;
	}

	public void setParent(Organisation parent) {
		this.parent = parent;
	}
}
